<div class="d-flex flex-row flex-wrap">
    <div class="flex-grow-0 flex-shrink-0">

    </div>
    <div class="flex-grow-1 flex-shrink-1">
        <table class="table">
            <tbody>
                <tr>
                    <th class="text-right">Name</th>
                    <td>{{ $diet->name }}</td>
                </tr>
                <tr>
                    <th class="text-right">Description</th>
                    <td>{{ asset('$diet->image') }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
