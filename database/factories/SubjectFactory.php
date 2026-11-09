<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects =[
            'Pemrograman Dasar',
            'Dasar-Dasar Teknik Jaringan Komputer',
            'Administrasi Sistem Jaringan',
            'Teknologi Layanan Jaringan',
            'Pemrograman Web',
            'Basis Data',
            'Sistem Komputer',
            'Informatika',
            'Keamanan Jaringan',
            'Produk Kreatif dan Kewirausahaan'
        ];
        
        return [
            'name' => fake()->unique()->randomElement($subjects),
        ];
    }
}