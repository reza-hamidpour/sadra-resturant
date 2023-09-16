<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestFoodCreationForm extends TestCase
{
    use WithFaker;

    public function __construct()
    {
        parent::__construct();

        $this->setUpFaker();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function FoodsIndexPage(){
        $response = $this->get('/foods');
        $response->assetStatus(200);
    }

//    public function FoodsCreation(){
//
//        $data = [
//            'title' => $this->faker->title,
//            'slug' => $this->faker->slug,
//            'price' => $this->faker->numberBetween(10, 20) + "0.00",
//            'pic_url' => ''
//
//        ];
//        $response = $this->post('/foods/create', $data);
//    }

}
