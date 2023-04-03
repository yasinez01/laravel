<?php


namespace Tests\app\Infrastructure\Controller;
use Tests\TestCase;

class GetUserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function userWithGivenEmailDoesNotExist(){
        $response = $this->get('/api/user/email@email.com');
        $response->assertNotFound();
        $response->assertExactJson(['error'=>'usuario no encontrado']);
    }
    /**
     * @test
     */
    public function userWithGivenEmailDoesExist(){
        $response = $this->get('/api/user/email2@email.com');
        $response->assertExactJson(['id' => '1', 'email' => 'email@email.com']);
    }
}
