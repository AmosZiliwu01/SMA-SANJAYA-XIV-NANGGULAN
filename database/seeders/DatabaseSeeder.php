<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            AgendaSeeder::class,
            AlbumSeeder::class,
            GallerySeeder::class,
            ClassSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            AnnouncementSeeder::class,
            FileSeeder::class,
            TestimonialSeeder::class,
            MessageSeeder::class,
            VisitorSeeder::class,
            ActivityLogSeeder::class,
        ]);
    }
}
