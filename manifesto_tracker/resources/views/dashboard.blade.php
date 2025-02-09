@extends('layouts.app')

@section('content')
<div class="mx-auto" style="width: 500px;">
<h1>Manifesto Tracker Chart</h1>
</div>
<div class="container" style="width: 400px;">
    <canvas id="manifestoChart"></canvas>
</div>
<script>
    var ctx = document.getElementById('manifestoChart').getContext('2d');
    var data = {
        labels: ['Broken', 'Done', 'In Progress', 'Not Started'],
        datasets: [{
            data: [@json($broken), @json($done), @json($in_progress), @json($not_started)],
            backgroundColor: ['#FF0000', '#00FF00', '#FFFF00', '#E0E0E0']
        }]
    };
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data
    });
</script>
<br>
<div class="mx-auto" style="width: 80vw">
    <div class="pb-2">
        Filter by Category
    <span class="px-3">
        <button onclick="catBtnClick(this)" class="btn bg-primary-subtle" id="Education" value="Education">Education</button>
    </span>
    <span class="px-3">
        <button onclick="catBtnClick(this)" class="btn bg-primary-subtle" id="Health" value="Health">Health</button>
    </span>
    <span class="ps-3">
        <button onclick="catBtnClick(this)" class="btn bg-primary-subtle" id="Housing" value="Housing">Housing</button>
    </span>
    </div>
    <div class="pb-2">
        Filter by Progress
    <span class="px-3">
        <button onclick="proBtnClick(this)" class="btn bg-danger-subtle" id="Broken" value="broken">Broken</button>
    </span>
    <span class="px-3">
        <button onclick="proBtnClick(this)" class="btn bg-success-subtle" id="Done" value="done">Done</button>
    </span>
    <span class="px-3">
        <button onclick="proBtnClick(this)" class="btn bg-warning-subtle" id="In Progress" value="in progress">In Progress</button>
    </span>
    <span class="ps-3">
        <button onclick="proBtnClick(this)" class="btn bg-secondary-subtle" id="Not Started" value="not started">Not Started</button>
    </span>
    </div>
<table class="table table-bordered">
    <tbody id="myTable">
    @foreach($manifestos as $manifesto)
    
        @if($manifesto->Policy_Progress=="done")
        <?php
            $color = 'table-success';
        ?>
        @elseif($manifesto->Policy_Progress=="broken")
        <?php
            $color = 'table-danger';
        ?>
        @elseif($manifesto->Policy_Progress=="in progress")
        <?php
            $color = 'table-warning';
        ?>
        @elseif($manifesto->Policy_Progress=="not started")
        <?php
            $color = 'table-secondary';
        ?>
        @else
        <?php
            $color = 'table-white';
        ?>
        @endif
        <tr class=<?php echo $color;?>>
            <td>{{ $manifesto->Policy_Number }}</td>
            <td>{{ $manifesto->Policy_Item }}</td>
            <td>{{ $manifesto->Category }}</td>
            <td>{{ $manifesto->Policy_Progress }}</td>
            <td>{{ $manifesto->Comment }}</td>
        </tr>
        @endforeach
    
    </tbody>
</table>
</div>
<script type="text/javascript">
    let category = "All"
    let progress = "All"
    function catColorChange(btn){
        button = document.getElementById("Education");
        if (button==btn) {
            button.classList.toggle("bg-primary-subtle");
            button.classList.toggle("btn-primary");
            console.log(button);
            if(document.getElementById("Health").classList.contains("btn-primary")){
                document.getElementById("Health").classList.toggle("bg-primary-subtle");
                document.getElementById("Health").classList.toggle("btn-primary");
            }
            if(document.getElementById("Housing").classList.contains("btn-primary")){
                document.getElementById("Housing").classList.toggle("bg-primary-subtle");
                ocument.getElementById("Housing").classList.toggle("btn-primary");
            }
        } else {
            button = document.getElementById("Health");
            if (button==btn) {
                button.classList.toggle("bg-primary-subtle");
                button.classList.toggle("btn-primary");
                console.log(button);
                if(document.getElementById("Education").classList.contains("btn-primary")){
                    document.getElementById("Education").classList.toggle("bg-primary-subtle");
                    document.getElementById("Education").classList.toggle("btn-primary");
                }
                if(document.getElementById("Housing").classList.contains("btn-primary")){
                    document.getElementById("Housing").classList.toggle("bg-primary-subtle");
                    document.getElementById("Housing").classList.toggle("btn-primary")
                }
            } else {
                button = document.getElementById("Housing");
                button.classList.toggle("bg-primary-subtle");
                button.classList.toggle("btn-primary");
                console.log(button);
                    if(document.getElementById("Education").classList.contains("btn-primary")){
                        document.getElementById("Education").classList.toggle("bg-primary-subtle");
                        document.getElementById("Education").classList.toggle("btn-primary");
                    }
                    if(document.getElementById("Health").classList.contains("btn-primary")){
                        document.getElementById("Health").classList.toggle("btn-primary");
                        document.getElementById("Health").classList.toggle("bg-primary-subtle");
                    }
            }
        }
    }
    function proColorChange(btn){
        button = document.getElementById("Broken");
        if (button==btn) {
            button.classList.toggle("bg-danger-subtle");
            button.classList.toggle("btn-danger");
            console.log(button);
            if(document.getElementById("Done").classList.contains("btn-success")){
                document.getElementById("Done").classList.toggle("bg-success-subtle");
                document.getElementById("Done").classList.toggle("btn-success");
            }
            if(document.getElementById("In Progress").classList.contains("btn-warning")){
                document.getElementById("In Progress").classList.toggle("bg-warning-subtle");
                document.getElementById("In Progress").classList.toggle("btn-warning");
            }
            if(document.getElementById("Not Started").classList.contains("btn-secondary")){
                document.getElementById("Not Started").classList.toggle("bg-secondary-subtle");
                document.getElementById("Not Started").classList.toggle("btn-secondary");
            }
        } else {
            button = document.getElementById("Done");
            if (button==btn) {
                button.classList.toggle("bg-success-subtle");
                button.classList.toggle("btn-success");
                console.log(button);
                if(document.getElementById("Broken").classList.contains("btn-danger")){
                    document.getElementById("Broken").classList.toggle("bg-danger-subtle");
                    document.getElementById("Broken").classList.toggle("btn-danger");
                }
                if(document.getElementById("In Progress").classList.contains("btn-warning")){
                    document.getElementById("In Progress").classList.toggle("bg-warning-subtle");
                    document.getElementById("In Progress").classList.toggle("btn-warning");
                }
                if(document.getElementById("Not Started").classList.contains("btn-secondary")){
                    document.getElementById("Not Started").classList.toggle("bg-secondary-subtle");
                    document.getElementById("Not Started").classList.toggle("btn-secondary");
                }
            } else {
                button = document.getElementById("In Progress");
                if (button==btn) {
                    button.classList.toggle("bg-warning-subtle");
                    button.classList.toggle("btn-warning");
                    console.log(button);
                    if(document.getElementById("Broken").classList.contains("btn-danger")){
                        document.getElementById("Broken").classList.toggle("bg-danger-subtle");
                        document.getElementById("Broken").classList.toggle("btn-danger");
                    }
                    if(document.getElementById("Done").classList.contains("btn-success")){
                        document.getElementById("Done").classList.toggle("bg-success-subtle");
                        document.getElementById("Done").classList.toggle("btn-success");
                    }
                    if(document.getElementById("Not Started").classList.contains("btn-secondary")){
                        document.getElementById("Not Started").classList.toggle("bg-secondary-subtle");
                        document.getElementById("Not Started").classList.toggle("btn-secondary");
                    }
                } else {
                    button = document.getElementById("Not Started");
                    button.classList.toggle("bg-secondary-subtle");
                    button.classList.toggle("btn-secondary");
                    console.log(button);
                    if(document.getElementById("Broken").classList.contains("btn-danger")){
                        document.getElementById("Broken").classList.toggle("bg-danger-subtle");
                        document.getElementById("Broken").classList.toggle("btn-danger");
                    }
                    if(document.getElementById("Done").classList.contains("btn-success")){
                        document.getElementById("Done").classList.toggle("bg-success-subtle");
                        document.getElementById("Done").classList.toggle("btn-success");
                    }
                    if(document.getElementById("In Progress").classList.contains("btn-warning")){
                        document.getElementById("In Progress").classList.toggle("bg-warning-subtle");
                        document.getElementById("In Progress").classList.toggle("btn-warning");
                    }
                }
            }
        }
    }
    function catBtnClick(btn){
        catColorChange(btn);
        if(/btn-/.test(btn.className)){
        category = btn.value;
        if (category != "All") {
            if (progress != "All") {
                //console.log("chosen both: ");
                //console.log(category)
                //console.log(progress)
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(category) > -1 && $(this).text().indexOf(progress) > -1)
                });
            }else{
                //console.log("chose only category")
                //console.log(category)
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(category) > -1)
                });
            }
        }else{
            if (progress != "All") {
                //console.log("chosen only progress: ");
                //console.log(progress)
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(progress) > -1)
                });
            }else{
                //console.log("chose none")
                $("#myTable tr").filter(function() {
                    $(this).toggle(true);
                });
            }
        }
        }else{
            category = "All";
            if (progress != "All") {
                //console.log("chosen only progress: ");
                //console.log(progress)
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(progress) > -1)
                });
            }else{
                //console.log("chose none")
                $("#myTable tr").filter(function() {
                    $(this).toggle(true);
                });
            }
        }
    }
    function proBtnClick(btn){
        proColorChange(btn);
        if (/btn-/.test(btn.className)) {
            
        progress = btn.value;
        //console.log(progress);
        if (progress != "All") {
            if (category != "All") {
                //console.log("chosen both: ");
                //console.log(category);
                //console.log(progress);
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(category) > -1 && $(this).text().indexOf(progress) > -1);
                });
            }else{
                //console.log("chose only progress")
                //console.log(progress);
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(progress) > -1);
                });
            }
        }else{
            if (category != "All") {
                //console.log("chosen only category: ");
                //console.log(category);
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(category) > -1);
                });
            }else{
                //console.log("chose none");
                $("#myTable tr").filter(function() {
                    $(this).toggle(true);
                });
            }
        }
        }else{
            progress = "All"
            if (category != "All") {
                //console.log("chosen only category: ");
                //console.log(category);
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(category) > -1);
                });
            }else{
                //console.log("chose none");
                $("#myTable tr").filter(function() {
                    $(this).toggle(true);
                });
            }
        }
    }
    /*HTML Code for v1
    <span>Filter by Category</span><span class="ps-4">Filter by Progress</span>
    <div class="dropdown pb-2">
        <span class="pe-3">
        <select class="btn btn-secondary dropdown-toggle" id="category">
            <option selected class="dropdown-item">All</option>
            <option value="Education" class="dropdown-item">Education</option>
            <option value="Health" class="dropdown-item">Health</option>
            <option value="Housing" class="dropdown-item">Housing</option>
        </select>
        </span>
        <span class="ps-3">
        <select class="btn btn-secondary dropdown-toggle" id="progress">
            <option selected class="dropdown-item">All</option>
            <option value="broken" class="dropdown-item">Broken</option>
            <option value="done" class="dropdown-item">Done</option>
            <option value="in progress" class="dropdown-item">In Progress</option>
            <option value="not started" class="dropdown-item">Not Started</option>
        </select>
        </span>
        <span class="ps-3">
            <button onclick="getBothOptions()" class="btn btn-secondary">
                Filter
            </button>
        </span>
    </div>
    Js code for v1
    function getBothOptions() {
        var selectElement1 = document.querySelector('#category');
        var category = selectElement1.value;
        var selectElement2 = document.querySelector('#progress');
        var progress = selectElement2.value;
        if (category != "All") {
            if (progress != "All") {
                console.log("chosen both: ");
                console.log(category)
                console.log(progress)
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(category) > -1 && $(this).text().indexOf(progress) > -1)
                });
            }else{
                console.log("chose only category")
                console.log(category)
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(category) > -1)
                });
            }
        }else{
            if (progress != "All") {
                console.log("chosen only progress: ");
                console.log(progress)
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(progress) > -1)
                });
            }else{
                console.log("chose none")
                $("#myTable tr").filter(function() {
                    $(this).toggle(true);
                });
            }
        }
    }
    */

</script>
@endsection
