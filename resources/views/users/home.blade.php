@extends('layouts.app');

@section('title', 'Welcome');

@section('content')

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa-solid fa-bullhorn fa-2x"></i>&nbsp;&nbsp; <p class="h4 mt-1">Announcements</p> &nbsp;&nbsp;
           
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          @foreach ($user_tasks as $task)
            @if($task->user->id === Auth::user()->id)
              <div class="alert alert-info" role="alert">
                <p class="h5 p-2">Requested to submit <a href="#" class="alert-link"> {{ $task->task->name }}</a>  &nbsp;&nbsp; </p>
              </div>
            @endif
          @endforeach
        </div>
        <div class="d-flex justify-content-center mt-1">
          {{ $user_tasks->links() }}
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fa-solid fa-circle-exclamation fa-2x"></i>&nbsp;&nbsp; <p class="h4 mt-1">Notification</p> &nbsp;&nbsp; &nbsp;
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
              {{-- welcome message --}}
              <div class="container-fluid position-relative bg-white shadow-lg" style="min-height: 50vh;">
                <img src="/css/welcome.jpg" alt="Overlay Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
                <div class="d-flex flex-column justify-content-between align-items-center" style="height: 100%;">
                    <div class="text-center mt-5">
                        <h1 class="display-5 mb-3">
                            Welcome to the team, {{Auth::user()->name}}!
                        </h1>
                        <p class="fs-5 mb-4">
                            Our HR team will be informing you of the required documents for your onboarding process.
                            <br> Please utilize your account to submit the required information.
                        </p>
                    </div>
                    <div class="text-end mb-5">
                        <h1 class="display-6">
                            We are excited to have you on board,
                            <br>and looking forward to achieving great things together!
                        </h1>
                    </div>
                </div>
              </div>
              {{-- end of welcome message --}}
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa-solid fa-circle-info fa-2x"></i>&nbsp;&nbsp; <p class="h4 mt-1">Info</p> &nbsp;&nbsp;
        </button>
      </h2>
      
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">

                  <div class="h4 fw-bold mt-2 ms-3">
                   
                  </div>
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      <h5 class="fw-bold">Company Rules #1</h5>
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Code of Conduct/Ethics:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees are expected to adhere to the highest standards of honesty, integrity, and ethical behavior in all aspects of their work. <br>This includes avoiding conflicts of interest, maintaining confidentiality, and treating colleagues, clients, and customers with respect. 
                            </p>
                        </div>
                      </div>

                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Dress Code:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees are expected to dress appropriately for the workplace. <br> The company may have specific guidelines regarding attire, such as business casual or formal dress. <br>Confidentiality: Employees are expected to maintain the confidentiality of sensitive company information, including proprietary data, customer information, and trade secrets. Unauthorized disclosure of confidential information is strictly prohibited.
                            </p>
                        </div>
                      </div>
                       
                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Confidentiality:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees are expected to maintain the confidentiality of sensitive company information, including proprietary data, customer information, and trade secrets. Unauthorized disclosure of confidential information is strictly prohibited.
                          </p>
                        </div>
                      </div>

                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Use of Company Property/Resources: 
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Company property, including equipment, vehicles, and electronic devices, should be used responsibly and only for legitimate business purposes. <br> Personal use of company resources should be kept to a minimum. 
                          </p>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      <h5 class="fw-bold">Company Rules #2</h5>
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Workplace Safety:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees are responsible for following all safety guidelines and procedures to ensure a safe work environment for themselves and their colleagues. <br> This includes reporting any hazards or accidents promptly.  
                          </p>
                        </div>
                      </div>

                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Harassment and Discrimination:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            The company prohibits harassment or discrimination based on race, color, religion, gender, sexual orientation, age, disability, or any other protected characteristic. <br>All employees are expected to treat others with dignity and respect.
                          </p>
                        </div>
                      </div>

                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Drug and Alcohol Policy:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees should use company-provided technology and access to the internet responsibly and in accordance with company policies. This includes refraining from posting inappropriate or offensive content on social media that could reflect poorly on the company.
                          </p>
                        </div>
                      </div>

                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Social Media and Internet Usage: 
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            The company may have policies regarding the use of drugs and alcohol in the workplace. This may include prohibitions on being under the influence of drugs or alcohol while on duty.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      <h5 class="fw-bold">Company Rules #3</h5>
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Conflict of Interest:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees should avoid situations where their personal interests conflict with the interests of the company. This includes disclosing any outside activities or financial interests that could potentially create a conflict of interest.
                          </p>
                        </div>
                      </div>

                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Performance Expectations: 
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees are expected to perform their job duties to the best of their abilities and meet established performance standards. Feedback and evaluations may be provided to help employees improve their performance.
                          </p>
                        </div>
                      </div>

                      <div class="card mb-3">
                        <div class="card-header fw-bold bg-secondary-subtle">
                          Compliance with Laws and Regulations:
                        </div>
                        <div class="card-body">
                          <p class="h6">
                            Employees are required to comply with all applicable laws, regulations, and company policies in the performance of their duties.
                          </p>
                        </div>
                      </div>
                    </div>

                    </div>
                  </div>
                </div>
              </div>

                
                  <div class="p-3">
                    <div class="h6">
                    

      
      

     

    
      

     

      

    

      
                    </div>
                  </div>

                  
              </div>
            </div>
        </div>

    
</div>



@endsection
