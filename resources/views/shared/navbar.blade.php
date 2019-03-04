<nav class="navbar is-fixed-top has-shadow is-dark" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url("/") }}" class="navbar-item">
                {{ config('app.name') }}
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="sidebar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        
        <div id="navbar" class="navbar-menu">            
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>