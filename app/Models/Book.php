<?php

namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'author_id', 'language', 'country', 'year', 'pages', 'description', 'image'];


    public function scopeFilter($query, array $filters)
    {
        // $authors = self::has('author')->get();
        // $authors = self::with('author')
        //     ->whereHas('author', function (Builder $query) {
        //         $query->where('name', 'like', '%' . request('search') . '%');
        //     })
        //     ->get();
        // $author = Author::where("name", "=", request("search"));
        // 

        // $author = Author::where("name", "=", request("search"))->first();
        $author = Author::where("name", "like", '%' .  request("search") . '%')->first() ?? false;

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('language', 'like', '%' . request('search') . '%')
                ->orWhere('country', 'like', '%' . request('search') . '%')
                // ->orWhere("author_id", "=", $authors->id)
                ->orWhere("author_id", "=", $author->id)
                // ->orWhere($authors, 'like', '%' . request('search') . '%')
                ->orWhere('year', 'like', '%' . request('search') . '%');
        }
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function editor()
    {
        return $this->belongsTo(User::class);
    }
    // public static function allBooks()
    // {
    //     return [
    //         [
    //             'id' => '0',
    //             'author' => 'Valmiki',
    //             'country' => 'India',
    //             'image' => 'images/ramayana.jpg',
    //             'language' => 'Sanskrit',
    //             'pages' => 152,
    //             'title' => 'Ramayana',
    //             'description' => "The Ramayana is an ancient Sanskrit epic which follows Prince Rama's quest to rescue his beloved wife Sita from the clutches of Ravana with the help of an army of monkeys",
    //             'year' => -450,
    //         ],

    //         [
    //             'id' => '1',
    //             'author' => 'Virginia Woolf',
    //             'country' => 'United Kingdom',
    //             'image' => 'images/mrs-dalloway.jpg',
    //             'language' => 'English',
    //             'pages' => 216,
    //             'title' => 'Mrs Dalloway',
    //             'description' => 'Mrs Dalloway, which takes place on one day in June 1923, shows how the First World War continued to affect those who had lived through it, five years after it ended.',
    //             'year' => 1925,
    //         ],
    //         [
    //             'id' => '2',
    //             'author' => 'Virginia Woolf',
    //             'country' => 'United Kingdom',
    //             'image' => 'images/to-the-lighthouse.jpg',
    //             'language' => 'English',
    //             'pages' => 209,
    //             'title' => 'To the Lighthouse',
    //             'description' => 'To the Lighthouse is made up of three powerfully charged visions into the life of the Ramsay family, living in a summer house off the rocky coast of Scotland. ',
    //             'year' => 1927,
    //         ],
    //         [
    //             'id' => '3',
    //             'author' => 'Francois Rabelais',
    //             'country' => 'France',
    //             'image' => 'images/gargantua-and-pantagruel.jpg',
    //             'language' => 'French',
    //             'pages' => 623,
    //             'title' => 'Gargantua and Pantagruel',
    //             'description' => 'Gargantua and Pantagruel is an entertaining and comical satire of many aspects of education, religion and life in general. ',
    //             'year' => 1533,
    //         ],
    //         [
    //             'id' => '4',
    //             'author' => 'Rumi',
    //             'country' => 'Sultanate of Rum',
    //             'image' => 'images/the-masnavi.jpg',
    //             'language' => 'Persian',
    //             'pages' => 438,
    //             'title' => 'The Masnavi',
    //             'description' => 'The Masnavi is a poetic collection of anecdotes and stories derived from the Quran, hadith sources, and everyday tales.',
    //             'year' => 1236,
    //         ],
    //         [
    //             'id' => '5',
    //             'author' => 'Salman Rushdie',
    //             'country' => 'United Kingdom, India',
    //             'image' => 'images/midnights-children.jpg',
    //             'language' => 'English',
    //             'pages' => 536,
    //             'title' => "Midnight's Children",
    //             'description' => 'It is a historical chronicle of modern India centring on the inextricably linked fates of two children who were born within the first hour of independence from Great Britain.',
    //             'year' => 1981,
    //         ],
    //         [
    //             'id' => '6',
    //             'author' => 'Tayeb Salih',
    //             'country' => 'Sudan',
    //             'image' => 'images/season-of-migration-to-the-north.jpg',
    //             'language' => 'Arabic',
    //             'pages' => 139,
    //             'title' => 'Season of Migration to the North',
    //             'description' => "The late Sudanese author Tayeb Salih's Season of Migration to the North is an engaging and complicated novel, by turns combative and wistful, about two men who leave Sudan to study in England and afterward belong in neither place",
    //             'year' => 1966,
    //         ],
    //         [
    //             'id' => '7',
    //             'author' => 'José Saramago',
    //             'country' => 'Portugal',
    //             'image' => 'images/blindness.jpg',
    //             'language' => 'Portuguese',
    //             'pages' => 352,
    //             'title' => 'Blindness',
    //             'description' => 'Blindness, the 1995 book by Portuguese author José Saramago, tells the story of a society that’s been struck by a virulent epidemic of blindness.',
    //             'year' => 1995,
    //         ],
    //         [
    //             'id' => '8',
    //             'author' => 'William Shakespeare',
    //             'country' => 'England',
    //             'image' => 'images/hamlet.jpg',
    //             'language' => 'English',
    //             'pages' => 432,
    //             'title' => 'Hamlet',
    //             'description' => "The ghost of the King of Denmark tells his son Hamlet to avenge his murder by killing the new king, Hamlet's uncle. Hamlet feigns madness, contemplates life and death, and seeks revenge.",
    //             'year' => 1603,
    //         ],
    //         [
    //             'id' => '9',
    //             'author' => 'Marguerite Yourcenar',
    //             'country' => 'France/Belgium',
    //             'image' => 'images/memoirs-of-hadrian.jpg',
    //             'language' => 'French',
    //             'pages' => 408,
    //             'title' => 'Memoirs of Hadrian',
    //             'description' => 'Memoirs Of Hadrian is a sort of beautifully crafted hybrid of both fiction and nonfiction. The novel covers significant events in Roman history as narrated by Hadrian himself.',
    //             'year' => 1951,
    //         ],
    //     ];
    // }

    // public static function oneBook($id)
    // {
    //     $books = self::allBooks();

    //     foreach ($books as $book) {
    //         if ($book['id'] == $id) {
    //             return $book;
    //         }
    //     }
    // }
}
