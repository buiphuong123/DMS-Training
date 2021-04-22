@extends('layouts.app')

@section('content')
<div>
    <p class="maintitle">Monthly Timesheet</p>
  </div>

<section class="timesheet-navigation">
    <div class="nav">
      <div class="container-fluid nopaddingmail">
       <div class="tabbable">
        <ul class="nav nav-tabs" data-tabs="tabs" id="myTab">
        <li class="active"><a data-toggle="tab" href="#incoming">Current</a></li>
        <li><a data-toggle="tab" href="#sentmsg">Previous</a></li>
        <li><a data-toggle="tab" href="#sentmsg">Not Sent</a></li>
        <li><a data-toggle="tab" href="#sentmsg">Wait for Accept</a></li>
        <li><a data-toggle="tab" href="#sentmsg">Accepted</a></li>
        <li><a data-toggle="tab" href="#sentmsg">Rejected</a></li>
        </ul>
        <div class="tab-content">
        <div class="tab-pane active" id="incoming">
          
</section>


<section class="timesheet-buttons">

  <input type="date" id="theDate">
  
  <div class="today-timesheet">
    <button type="button" class="newmsgb">Today</button>
    <button type="button" class="add-task-timesheet" data-toggle="modal" data-target="#addtask">Add new TimeSheet</button>
  </div>
</section>

<section style="margin-top: -40px">
  
  <p class="picked-day">2016-12-30</p>


  
    
</section>

<section>
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12 tab-title">
       <div class="row">
          <div class="col-md-2 col-sm-2 col-xs-1">
            <div class="statustitle">id</div>
           </div>
           <div class="col-md-2 col-sm-2 col-xs-2">
             <div class="projectnametitle">Name TimeSheet</div>
           </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <div class="completiontitle">Hard</div>
           </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <div class="detailstitle">Plan</div>
            </div>
           
          </div>
        </div>
      </div>
    </div>  
</section>


<section>
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="row timesheet-task-row">
          <div class="col-md-2 col-sm-2 col-xs-1">
            <div class="statustitle">Project 1</div>
           </div>
           <div class="col-md-2 col-sm-2 col-xs-2">
             <div class="projectnametitle">Task 1</div>
           </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <div class="completiontitle">2016-12-12</div>
           </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <div class="detailstitle">12:00/13:00</div>
            </div>
            
          </div>
        </div>
      </div>
    </div>  
</section>


<!-- Modal -->
<div id="addtask" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content timesheet">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add TimeSheet</h4>
      </div>
      <div class="modal-body">
        
            <form class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                        <p>Project</p>
                        </div>
                        <div class="col-md-9">
                        
                        <input id="name" type="text" class="form-control" name="name"  required autocomplete="name" autofocus>
                        
                        </div>
                    </div>
                    
                </div>
                    
                    
                    <div class="row">
                        <div class="col-md-3">
                            <p>hard</p>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="hard" class="timesheet-description"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <p>plan</p>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="plan" class="timesheet-description"/>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <div clas="actionbutton">
                                <p class="button-container"><button class="user-aciton" type="submit">Add TimeSheet</button></p>
                            </div>  
                        </div>
                
                    </div>
                </form>
            </div>
          </div>
        </div>
        
        
        
        
        
        
        
      </div>
    </div>

  </div>
</div>


@endsection
