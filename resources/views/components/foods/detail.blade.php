<div class="d-flex flex-row flex-wrap">
    <div class="flex-grow-0 flex-shrink-0">

    </div>
    <div class="flex-grow-1 flex-shrink-1">
        <table class="table">
            <tbody>
                <tr>
                    <th class="text-right">Name</th>
                    <td>{{ $food->name }}</td>
                </tr>
                <tr>
                    <th class="text-right">Description</th>
                    <td>{{ $food->description }}</td>
                </tr>
                <tr>
                    <th class="text-right">Diet</th>
                    <td>{{ $food->diet_id->name }}</td>
                </tr>
                <tr>
                    <th class="text-right">Cost</th>
                    <td>{{ $food->cost }}</td>
                </tr>
                <tr>
                    <th class="text-right">Allergies</th>
                    <td>{{ $food->allergies }}</td>
                </tr>
                <tr>
                    <th class="text-right">Ingredients</th>
                    <td>{{ $food->ingredients }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
