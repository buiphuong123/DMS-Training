<form action="{{route('sheet.store')}}" method="post">
@csrf
    <div>
        <label for="name" >Name: </label>
        <input type="text" name="name" />
    </div>

    <div>
        <label for="hard">Hard: </label>
        <textarea type="text" name="hard" ></textarea>
    </div>

    <div>
        <label for="plan">Plan: </label>
        <textarea type="text" name="plan" ></textarea>
    </div>

    <div>
        <label for="name">User_id: </label>
        <input type="text" name="user" />
    </div>
        <button type="submit">dang bai</button>
    <div>
    </div>
</form>