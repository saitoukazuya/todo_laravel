<!--{{ form::open(['method' => 'get']) }}-->
<!--    {{ csrf_field() }}-->
<!--    <div class='form-group'>-->
<!--        {{ form::label('keyword', 'キーワード：') }}-->
<!--        {{ form::text('keyword', 'null', ['class', 'form-control']) }}-->
<!--    </div>-->
<!--    <div class='form-group'>-->
<!--        {{ form::submit('検索', ['class' => 'btn btn-outline-primary']) }}-->
<!--        <a href="{{ route('tasks') }}">クリア</a>-->
<!--    </div>-->
<!--{{ form::close() }}-->