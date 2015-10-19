<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Danny Lieu</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/articles">Articles</a></li>
                <li><div class="navbar-btn">
                        <a href="/auth/register" class="btn btn-primary">Register</a>
                        <a href="{{ $loginData['url'] }}" class="btn btn-primary">{{ $loginData['loginText'] }}</a>
                    </div></li>
            </ul>
        </div>
    </div>
</nav>