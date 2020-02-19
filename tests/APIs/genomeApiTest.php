<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\genome;

class genomeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_genome()
    {
        $genome = factory(genome::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/genomes', $genome
        );

        $this->assertApiResponse($genome);
    }

    /**
     * @test
     */
    public function test_read_genome()
    {
        $genome = factory(genome::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/genomes/'.$genome->id
        );

        $this->assertApiResponse($genome->toArray());
    }

    /**
     * @test
     */
    public function test_update_genome()
    {
        $genome = factory(genome::class)->create();
        $editedgenome = factory(genome::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/genomes/'.$genome->id,
            $editedgenome
        );

        $this->assertApiResponse($editedgenome);
    }

    /**
     * @test
     */
    public function test_delete_genome()
    {
        $genome = factory(genome::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/genomes/'.$genome->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/genomes/'.$genome->id
        );

        $this->response->assertStatus(404);
    }
}
