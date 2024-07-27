<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    private string $baseUrl = '/register';

    /**
     * El siguiente test prueba el registro de un usuario
     * Nota: tener en cuenta que los passwords al ser variables
     * el test puede devolver un status 201(éxito) o 422(Falló la validación)
     * si sale 422, ejecutar el test varias veces
     */
    public function test_user_register(): void
    {
        // Establecemos la contraseña de 5 a 8 caracteres para probar los validadores
        // Puede probar las contraseñas devueltas con var_dump($passwords);
        $passwords = $this->generatePasswords();

        $response = $this->postJson($this->baseUrl, [
                'name' => $this->faker->name,
                'email' => $this->faker->email,
                'password' => $passwords[0],
                'password_confirmation' => $passwords[1]
            ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'usuario' => [
                'name',
                'email',
                'id'
            ],
        ]);
    }

    /**
     * Función para generar dos passwords de 6 caracteres cada uno.
     * Se concatena un rand(1, 2) para que en cada ejecución del test
     * ambos puedan o no ser iguales y así probar la validación en el backend
     */

    private function generatePasswords(): array
    {
        $password = $this->faker->regexify('[A-Za-z0-9]{5}');

        $pass1 = $password.rand(1, 2);
        $pass2 = $password.rand(1, 2);

        return [$pass1, $pass2];
    }
}
