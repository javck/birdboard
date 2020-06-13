<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
 use WithFaker, RefreshDatabase;
 /**
  * A basic feature test example.
  *
  * @return void
  */
 public function testExample()
 {
  $response = $this->get('/');

  $response->assertStatus(200);
 }

 // @test
 public function test_a_user_can_post_a_project()
 {
  //不需要處理Exception
  $this->withoutExceptionHandling();

  $attributes = [
   'title'       => $this->faker->sentence,
   'description' => $this->faker->paragraph,
  ];
  //進行POST請求
  $this->post('/projects', $attributes)->assertRedirect('/projects');
  //驗證資料庫的projects表格是否有此資料
  $this->assertDatabaseHas('projects', $attributes);
  $this->get('/projects')->assertSee($attributes['title']);
 }

 /** @test */
public function a_project_require_a_title()
{
    $attributes = factory(\App\Project::class)->raw(['title'=>'']);
    $this->post('/projects',$attributes)->assertSessionHasErrors('title');
}

/** @test */
public function a_project_require_a_description()
{
    $attributes = factory(\App\Project::class)->raw(['description'=>'']);
    $this->post('/projects',$attributes)->assertSessionHasErrors('description');
}

}
