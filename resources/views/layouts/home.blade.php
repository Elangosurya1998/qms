<x-main-layout>
        <!-- Main -->
        <main id="mainArea">
            <div class="mwPageArea">

                <x-hero-image />

                <x-hero-video />

                <x-where-will-you />

                @include('includes.welcome')

                @include('includes.selectTab')

                @include('includes.experienceBishop')

                @include('includes.studentsPerspective')

                @include('includes.testimonials')

                @include('includes.ourMission')

                @include('includes.calendar')

                @include('includes.stayUpdated')

                @include('includes.yourFuture')

                <div class="Clear"></div>
            </div>
        </main>

</x-main-layout>
