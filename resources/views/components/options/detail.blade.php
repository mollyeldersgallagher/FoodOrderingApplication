<div class="d-flex flex-row flex-wrap">
    <div class="flex-grow-0 flex-shrink-0">

    </div>
    <div class="flex-grow-1 flex-shrink-1">
        <table class="table">
            <tbody>
                <tr>
                    <th class="text-right">Name</th>
                    <td>{{ $option->name }}</td>
                </tr>
                <tr>
                    <th class="text-right">Cost</th>
                    <td>{{ $option->cost }}</td>
                </tr>
                <tr>
                    <th class="text-right">Description</th>
                    <td>{{ asset('$option->image') }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
