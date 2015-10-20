<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Danny Lieu</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="/">
                        <span class="glyphicon glyphicon-home"></span>Home
                    </a>
                </li>
                <li class="active"><a href="/articles">
                        <span class="glyphicon glyphicon-book"></span>Articles
                    </a>
                </li>
            </ul>
            <div class="navbar-btn navbar-right">
                    <a href="/auth/register" class="btn btn-primary">Register</a>
                    <a href="{{ $loginData['url'] }}" class="btn btn-primary">{{ $loginData['loginText'] }}</a>
            </div>
        </div>

    </div>
</nav>