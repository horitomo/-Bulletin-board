<ul>
                    <li>Name: {{ $user->name }}</li>
                    <li>Email:{{ $user['email'] }}</li>
</ul>

<hr>
<pre>
@php
                    var_dump($user);
@endphp
</pre>