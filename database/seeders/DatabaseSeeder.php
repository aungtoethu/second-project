<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Codeblog;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {  
                
        $user1=User::factory()->create();
        $user2=User::factory()->create();

        $frontend=Category::factory()->create(['title'=>'frontend','slug'=>'frontend-data']);
        $backend=Category::factory()->create(['title'=>'backend','slug'=>'backend-data']);
        Codeblog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$user1->id]);
        Codeblog::factory(2)->create(['category_id'=>$backend->id,'user_id'=>$user2->id]);
        

        
       

    }
}
