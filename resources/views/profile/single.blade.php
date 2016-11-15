@extends('layouts.pages')

@section('title', 'Agents')

@section('topScripts')
    <script>
        $(document)
                .ready(function() {
                        $('.ui.fluid.search')
                                .dropdown()
                        ;

                        $('.ui.posts')
                                .dropdown()
                        ;

                        $('.ui.trending')
                                .dropdown()
                        ;

                        $('.ui.star.rating')
                                .rating('disable')
                        ;


                        document.getElementById('contact').addEventListener('click', function () {
                            $('.ui.basic.contact.modal')
                                    .modal({
                                        blurring: true
                                    })
                                    .modal('show');
                        }, false);

                    }
                );
    </script>
@endsection


@section('content')
    <!-- Main Page -->
    <div class="ui middle aligned stackable grid container">
        <div class="row articleHeader">
            <div class="nine wide column">
                <h1>
                    Agent Finder | {{ $agent->name }}<br>
                    <span>{{ $agent->city }}, {{ $agent->state }}</span>
                </h1>
            </div>
        </div>
    </div>

    <div class="ui grid container">
        <div class="seven wide computer seven wide tablet ten wide mobile column">
            <div class="ui segment">
                <div class="agent">
                    <img class="ui fluid medium image" src="{{ asset('images/' . $agent->image) }}">
                    {{--<div class="extra">--}}
                        {{--Rating:<div class="ui huge star rating" data-rating="4" disabled=""></div>--}}
                    {{--</div>--}}
                </div>
                <div class="ui divider"></div>
                <div class="ui compact menu">
                    {{--<a class="item" id="review">--}}
                        {{--<i class="edit icon"></i>--}}
                        {{--Write a Review--}}
                    {{--</a>--}}
                    <a class="item" id="contact" style="padding: 0 83px;">
                        <i class="mail icon"></i>
                        Contact Agent
                    </a>
                </div>

            </div>
        </div>
        <div class="nine wide computer eight wide tablet fifteen wide mobile column">
            <div class="ui segment">
                <h5>Experience:</h5>
                <p>{{ $agent->experience }}</p>

                <h5>Brokerage:</h5>
                <p>{{ $agent->company_name }}</p>
                <a href="http://{{ $agent->company_url }}" target="_blank">{{ $agent->company_url }}</a>
            </div>
        </div>
    </div>


    <div class="ui basic contact modal">
        <i class="close icon"></i>
        <div class="header">
            <i class="comment icon"></i> Contact Form
        </div>
        <div class="content">
            <div class="description">
                <form class="ui form" action="{{ url('pages/'. $agent->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="field">
                        <label>First Name</label>
                        <input name="firstName" placeholder="First Name" type="text">
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input name="lastName" placeholder="Last Name" type="text">
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input name="email" placeholder="Email" type="email">
                    </div>
                    <div class="field">
                        <label>Message</label>
                        <textarea rows="2" name="message"></textarea>
                    </div>
                    <div class="actions">
                        <button type="submit" class="ui positive right labeled icon button">
                            <i class="send icon"></i> Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection