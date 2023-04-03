<?php


namespace Tests\app\Infrastructure\Controller;
use App\Application\UserDataSource\UserDataSource;
use Tests\TestCase;

class GetUsersControllerTest extends TestCase
{
    /**
     * @test
     */
   /* public function ListOfUsersEmpty(){
        $userdata = \Mockery::mock(UserDataSource::class);
        $userdata
            ->expects('getAll')
            ->andReturn([]);
        $response = $this->get('/api/users');
        $response->assertExactJson([]);
    }*/
    /**
     * @test
     */
    public function ListOfUsersNotEmpty(){
        $response = $this->get('/api/users');
        $response->assertExactJson([['id' => '1', 'email' => 'email@email.com'],['id' => '2', 'email' => 'another_email@email.com']]);
    }
}
