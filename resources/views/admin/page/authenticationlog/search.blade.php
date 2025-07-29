@foreach ($results as $item)
    <tr>
        <td>
            <ul class="menu-item m-0 p-0">
                <li class="menu-item m-0 p-0">Name: {{ $item->user->name ?? '' }}</li>
                <li class="menu-item m-0 p-0">Email: {{ $item->user->email ?? '' }}</li>
                <li class="menu-item m-0 p-0">Phone: {{ $item->user->phone ?? '' }}</li>
            </ul>
        </td>
        <td>{{ $item->authenticatable_type ?? '' }}</td>
        <td>{{ $item->ip_address ?? '' }}</td>
        <td>
            <p>{{ $item->user_agent ?? '' }}</p>
        </td>
        <td>{{ $item->login_at ?? '' }}</td>
        <td>{{ $item->logout_at ?? '' }}</td>
    </tr>
@endforeach
<div class="px-4">
    {{ $results->links('pagination::bootstrap-5') }}
</div>
