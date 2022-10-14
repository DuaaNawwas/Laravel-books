<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Book::create([
            'author' => 'Valmiki',
            'country' => 'India',
            'image' => 'images/ramayana.jpg',
            'language' => 'Sanskrit',
            'pages' => 152,
            'title' => 'Ramayana',
            'description' => "The Ramayana is an ancient Sanskrit epic which follows Prince Rama's quest to rescue his beloved wife Sita from the clutches of Ravana with the help of an army of monkeys",
            'year' => -450
        ]);
        Book::create([
            'author' => 'Virginia Woolf',
            'country' => 'United Kingdom',
            'image' => 'images/mrs-dalloway.jpg',
            'language' => 'English',
            'pages' => 216,
            'title' => 'Mrs Dalloway',
            'description' => 'Mrs Dalloway, which takes place on one day in June 1923, shows how the First World War continued to affect those who had lived through it, five years after it ended.',
            'year' => 1925
        ]);
        Book::create([
            'author' => 'Virginia Woolf',
            'country' => 'United Kingdom',
            'image' => 'images/to-the-lighthouse.jpg',
            'language' => 'English',
            'pages' => 209,
            'title' => 'To the Lighthouse',
            'description' => 'To the Lighthouse is made up of three powerfully charged visions into the life of the Ramsay family, living in a summer house off the rocky coast of Scotland. ',
            'year' => 1927
        ]);
        Book::create([
            'author' => 'Francois Rabelais',
            'country' => 'France',
            'image' => 'images/gargantua-and-pantagruel.jpg',
            'language' => 'French',
            'pages' => 623,
            'title' => 'Gargantua and Pantagruel',
            'description' => 'Gargantua and Pantagruel is an entertaining and comical satire of many aspects of education, religion and life in general. ',
            'year' => 1533
        ]);
        Book::create([
            'author' => 'Rumi',
            'country' => 'Sultanate of Rum',
            'image' => 'images/the-masnavi.jpg',
            'language' => 'Persian',
            'pages' => 438,
            'title' => 'The Masnavi',
            'description' => 'The Masnavi is a poetic collection of anecdotes and stories derived from the Quran, hadith sources, and everyday tales.',
            'year' => 1236
        ]);
        Book::create([
            'author' => 'Salman Rushdie',
            'country' => 'United Kingdom, India',
            'image' => 'images/midnights-children.jpg',
            'language' => 'English',
            'pages' => 536,
            'title' => "Midnight's Children",
            'description' => 'It is a historical chronicle of modern India centring on the inextricably linked fates of two children who were born within the first hour of independence from Great Britain.',
            'year' => 1981
        ]);
        Book::create([
            'author' => 'Tayeb Salih',
            'country' => 'Sudan',
            'image' => 'images/season-of-migration-to-the-north.jpg',
            'language' => 'Arabic',
            'pages' => 139,
            'title' => 'Season of Migration to the North',
            'description' => "The late Sudanese author Tayeb Salih's Season of Migration to the North is an engaging and complicated novel, by turns combative and wistful, about two men who leave Sudan to study in England and afterward belong in neither place",
            'year' => 1966
        ]);
        Book::create([
            'author' => 'José Saramago',
            'country' => 'Portugal',
            'image' => 'images/blindness.jpg',
            'language' => 'Portuguese',
            'pages' => 352,
            'title' => 'Blindness',
            'description' => 'Blindness, the 1995 book by Portuguese author José Saramago, tells the story of a society that’s been struck by a virulent epidemic of blindness.',
            'year' => 1995
        ]);
        Book::create([
            'author' => 'William Shakespeare',
            'country' => 'England',
            'image' => 'images/hamlet.jpg',
            'language' => 'English',
            'pages' => 432,
            'title' => 'Hamlet',
            'description' => "The ghost of the King of Denmark tells his son Hamlet to avenge his murder by killing the new king, Hamlet's uncle. Hamlet feigns madness, contemplates life and death, and seeks revenge.",
            'year' => 1603
        ]);
        Book::create([
            'author' => 'Marguerite Yourcenar',
            'country' => 'France/Belgium',
            'image' => 'images/memoirs-of-hadrian.jpg',
            'language' => 'French',
            'pages' => 408,
            'title' => 'Memoirs of Hadrian',
            'description' => 'Memoirs Of Hadrian is a sort of beautifully crafted hybrid of both fiction and nonfiction. The novel covers significant events in Roman history as narrated by Hadrian himself.',
            'year' => 1951
        ]);
    }
}
