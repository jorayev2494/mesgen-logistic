<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Database\Seeders\UserTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SliderTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @return void
     */
    public function test_admin_get_sliders(): void
    {
        $admin = User::factory()->create();
        $response = $this->actingAs($admin)->get(route('admin.sliders.index'));
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function test_unauthorized_admin_get_sliders(): void
    {
        $response = $this->getJson(route('admin.sliders.index'));
        $response->assertUnauthorized();
    }

    public function test_admin_create_slider(): void
    {
        $text = $this->faker->text;
        // $fakeStorage = Storage::fake('fake');
        $media = UploadedFile::fake()->image('media');
        dd(
            $media
        );

        $response = $this->postJson(route('admin.sliders.store'), compact('text', 'media'));
        $response->assertOk();

        $this->assertTrue($fakeStorage->exists($media->getPath()));
    }
}
