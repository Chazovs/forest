<?php namespace Tests\Repositories;

use App\Models\genome;
use App\Repositories\genomeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class genomeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var genomeRepository
     */
    protected $genomeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->genomeRepo = \App::make(genomeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_genome()
    {
        $genome = factory(genome::class)->make()->toArray();

        $createdgenome = $this->genomeRepo->create($genome);

        $createdgenome = $createdgenome->toArray();
        $this->assertArrayHasKey('id', $createdgenome);
        $this->assertNotNull($createdgenome['id'], 'Created genome must have id specified');
        $this->assertNotNull(genome::find($createdgenome['id']), 'genome with given id must be in DB');
        $this->assertModelData($genome, $createdgenome);
    }

    /**
     * @test read
     */
    public function test_read_genome()
    {
        $genome = factory(genome::class)->create();

        $dbgenome = $this->genomeRepo->find($genome->id);

        $dbgenome = $dbgenome->toArray();
        $this->assertModelData($genome->toArray(), $dbgenome);
    }

    /**
     * @test update
     */
    public function test_update_genome()
    {
        $genome = factory(genome::class)->create();
        $fakegenome = factory(genome::class)->make()->toArray();

        $updatedgenome = $this->genomeRepo->update($fakegenome, $genome->id);

        $this->assertModelData($fakegenome, $updatedgenome->toArray());
        $dbgenome = $this->genomeRepo->find($genome->id);
        $this->assertModelData($fakegenome, $dbgenome->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_genome()
    {
        $genome = factory(genome::class)->create();

        $resp = $this->genomeRepo->delete($genome->id);

        $this->assertTrue($resp);
        $this->assertNull(genome::find($genome->id), 'genome should not exist in DB');
    }
}
