<?php

use Illuminate\Support\Facades\Route;

Route::get('/kontak', function () {
    $nama = "Rizal";
    $teks = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        Aspernatur eos, nesciunt voluptatibus nulla odit atque recusandae 
        iure impedit pariatur adipisci at neque a. 
        Iste in omnis est tenetur id repellendus commodi, 
        ut, totam soluta, veritatis eveniet ex? 

        Repudiandae illum fugiat nulla id facilis illo, 
        ratione, sint, in earum iste a? Est ullam, consequatur 
        fugit nihil aspernatur, voluptas incidunt, ab hic quaerat 
        non ducimus facilis necessitatibus sunt quibusdam commodi 
        animi temporibus esse. Neque expedita quaerat vitae repudiandae
        odio nihil eaque, velit magnam incidunt in illum odit possimus, 
        suscipit mollitia autem accusamus dicta perspiciatis optio? 

        Libero ex non amet fugiat exercitationem harum laudantium 
        eaque voluptate quisquam. Voluptatem quod enim dolorem ab 
        saepe aspernatur expedita ducimus fuga! Rerum odio, 
        et excepturi quaerat quae ullam vero iusto deleniti 
        ea nulla consectetur nisi. Consectetur laboriosam reiciendis 
        mollitia velit ex perferendis suscipit eius aliquid? 

        Autem, totam quasi! Impedit reprehenderit mollitia earum 
        eveniet debitis dolor rem est nobis similique cum ipsa quaerat, 
        quia natus id ducimus placeat suscipit itaque dicta odio, 
        ullam voluptatem! Necessitatibus temporibus, dolorum hic 
        aut minima molestiae enim illo nemo voluptas, corrupti 
        asperiores repellat, tenetur corporis excepturi ullam quae 

        voluptatem! Sapiente ducimus eos cum tempora tenetur magnam 
        recusandae, libero voluptate quis soluta eveniet labore ex 
        nulla hic quasi maiores consectetur laboriosam quaerat dolores. 
        Nulla quasi ratione eum fuga placeat voluptate, cupiditate 
        veritatis unde, molestiae eaque laborum id soluta rem, 
        molestias numquam assumenda consequatur commodi porro 
        deserunt facere corporis accusamus! Vitae deleniti, 

        incidunt recusandae earum accusantium soluta doloremque animi, 
        quaerat maxime neque obcaecati fugiat nisi tempora impedit 
        laboriosam distinctio eius eum! Quod earum dolores, fugiat 
        nam nostrum nobis, cum asperiores distinctio sunt eligendi 
        nisi minus illo aspernatur! Facere, cumque. Quod a ullam error 
        ipsa reprehenderit natus provident temporibus tempore sit facere, 
        eaque, iure magnam, saepe perferendis soluta dolore doloremque 
        mollitia tempora possimus delectus pariatur laudantium.";

    return view('kontak', ['nama' => $nama, 'teks' => $teks]);
});

Route::view('/galeri', 'galeri');

Route::prefix('/posts')->middleware('auth')->group(function () {
    Route::get('/', 'PostController@index')->name('posts/index');
    Route::get('create', 'PostController@create')->name('posts/crete');    // membuka form create new post
    Route::post('store', 'PostController@store');    // proses menyimpan post
    Route::get('{post:slug}', 'PostController@show');    // model binding:slug
    Route::get('{post:slug}/edit', 'PostController@edit');   // membuka form edit post
    Route::patch('{post:slug}/edit', 'PostController@update');   // proses mengubah post
    Route::delete('{post:slug}/delete', 'PostController@destroy'); // proses menghapus post
});

Route::get('/categories/{category:slug}', 'CategoryController@show');

Route::view('articles/index', 'articles/index');
Route::view('series/index', 'series/index');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
