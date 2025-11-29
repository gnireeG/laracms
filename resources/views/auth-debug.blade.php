<div>
    <p>{{ auth()->check() ? 'Authenticated' : 'Not Authenticated' }}</p>
    <p>User ID: {{ auth()->id() }}</p>
    <p>User Name: {{ auth()->user() ? auth()->user()->name : 'N/A' }}</p>
</div>