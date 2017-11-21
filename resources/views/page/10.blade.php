@extends('page.layout')

@section('content')
                <div>
                    <h1 class="text-grey-darker text-center font-hairline tracking-wide text-7xl mb-8 pb-8">
                        ...Continue
                    </h1>
                    <ul class="list-reset text-2xl text-blue mt-8 pt-8">
                        <li class="pb-8">
                            1. Create a new test <span class="var">visitors_can_not_see_session_speaker_name</span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>
    /** @test */
    public function visitors_can_not_see_session_speaker_name()
    {

    }
                                </code></pre>
                            </span>
                        </li>
                        <li class="pb-8">
                            2. So what are we trying to do
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre>
                                    <code>
// Given we are not logged in

// And there are sessions in schedule page

// When we visit the schedule page

// Then we should not see the speaker name of session
</code>
                                </pre>
                            </span>
                        </li>
                        <li class="pb-8">
                            4. Write code in test method to make the test fail
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>
        $sessions = factory('App\Models\Session', 5)->create();
        $response = $this->get('schedule');
        $response->assertDontSee($sessions->first()->speaker);
                                </code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>
    public function setUp()
    {
        parent::setUp();

        $this->sessions = factory('App\Models\Session', 5)->create();
    }
                                </code></pre>
                            </span>
                        </li>
                        <li class="pb-8">
                            5. Write application code to make the test pass
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>
$factory->define(App\Models\Session::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'speaker' => $faker->name,
        'time' => $faker->time,
    ];
});
                                </code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>
            $table->string('title');
            $table->string('speaker');
            $table->time('time');
                                </code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>$ php artisan migrate</code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>        $response->assertStatus(200);</code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>Route::get('schedule', 'SessionsController@index');</code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>php artisan make:controller SessionsController</code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>
    public function index()
    {
        $sessions = Session::all();

        return view('schedule', compact("sessions"));
    }
                                </code></pre>
                            </span>
                        </li>
                        <li class="pb-8 mb-8">
                            <span class="code-block">
                                <pre><code>@verbatim
@if (Auth::check())
&#x3C;span class=&#x22;text-grey pr-4 invisible&#x22;&#x3E;{{ $session-&#x3E;time }}&#x3C;/span&#x3E;
&#x3C;a href=&#x22;#&#x22; class=&#x22;text-right no-underline text-blue-light text-base&#x22;&#x3E;
    {{ $session-&#x3E;speaker }}
&#x3C;/a&#x3E;
@endif
@endverbatim</code></pre>
                            </span>
                        </li>
                    @include('page.pagination')
                </div>
@endsection
