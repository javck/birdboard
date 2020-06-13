# Build a Laravel App With TDD

## 單元一 遇見Birdboard

```
//tests/Feature/ProjectTest.php

/** @test */
public function a_user_can_create_a_project(){
    //不需要處理Exception
    $this->withoutExceptionHandling();

    $attributes = [
        'title' => $this->faker->sentence,
        'description' => $this->faker->paragraph
    ];
    //進行POST請求
    $this->post('/projects',$attributes)->assertRedirect('/projects');
    //驗證資料庫的projects表格是否有此資料
    $this->assertDatabaseHas('projects',$attributes);
    $this->get('/projects')->assertSee($attributes['title']);

}
```
