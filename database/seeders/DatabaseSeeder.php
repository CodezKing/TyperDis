<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Credit;
use App\Models\Document;
use App\Models\Reader;
use App\Models\Font;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create credit factory
        $credit1 = Credit::factory()->create([
            'credit_id' => '000001',
            'credit' => range(1,1000)
        ]);

        $credit2 = Credit::factory()->create([
            'credit_id' => '000002',
            'credit' => range(1,1000)
        ]);

        $credits = collect([$credit1, $credit2]);

        // Create 4 fonts
        $fonts = collect([
        Font::factory()->create(['font_id' => '000001','font_name' => 'Times New Roman','document_id' => '000001']),
        Font::factory()->create(['font_id' => '000002','font_name' => 'Arial','document_id' => '000001',]),
        Font::factory()->create(['font_id' => '000003','font_name' => 'Calibri','document_id' => '000001']),
        Font::factory()->create(['font_id' => '000004','font_name' => 'Verdana','document_id' => '000001',]),
        ]);

        //Create 10 documents
        $documents = Document::factory(10)->create();
        
        // Create 10 users
        $users = User::factory(10)->create();

        //Associate account with a user
        $users->account()->associate($users)->save();

        //Associate random credits with a user
        $users->Credit()->associate($credits->random())->save();

        // Attach 1 to 3 random documents to a user
        $users->random()->documents()->attach(
            $documents->random(rand(1,3))->pluck('document_id')->toArray()
        );

        //Associate fonts with a document
        $fonts->document()->associate($fonts)->save();

       
    }
}
