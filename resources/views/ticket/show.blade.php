@extends("layouts.bmail")
@section('content')

    <div class="email-app-title card-body">
        <div class="row">
            <div class="col-md-8 col-12 text-left ">
                <h3 class="list-group-item-heading">{{$ticket->subject}}</h3>
            </div>
            <div class="col-md-4 col-12 text-right">
                <i class="font-medium-1  {{$status_list[$ticket->status][2].' '.$status_list[$ticket->status][1]}} font-medium-5"></i>
                @if($a=$ticket->download_file1)
                    <a href="{{$a}}"><i class="ft-paperclip font-medium-5 pl-1"></i></a>
                @endif
                @if($a=$ticket->download_file2)
                    <a href="{{$a}}"><i class="ft-paperclip font-medium-5 pl-1"></i></a>
                @endif
                @if($a=$ticket->download_file3)
                    <a href="{{$a}}"><i class="ft-paperclip font-medium-5 pl-1"></i></a>
                @endif

            </div>
        </div>
    </div>

    <div class="media-list">
        <div id="headingCollapse1" class="card-header p-0">
            <a data-toggle="collapse" href="#collapse1" aria-expanded="true"
               aria-controls="collapse1"
               class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">

                <div class="media-left pr-1">
						<span class="avatar avatar-md">
							<img class="media-object rounded-circle"
                                 src="../../../app-assets/images/portrait/small/avatar-s-1.png"
                                 alt="Generic placeholder image">
						</span>
                </div>
                <div class="media-body w-100">
                    <h6 class="list-group-item-heading text-bold-700">Steve Bush</h6>
                    <p class="list-group-item-text"> May 27, 2018
                        <span class="float-right">
								<i class="font-medium-1 ft-star danger lighten-3 font-medium-5 mr-1"></i>
								<i class="la la-ellipsis-v"></i>
							</span>
                    </p>

                </div>

            </a>
        </div>

        <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1"
             class="card-collapse collapse" aria-expanded="true">
            <div class="card-content">
                <div class="card-body">
                    <p>Hi Sarah,</p>
                    <p>Thank you for getting in touch with us.</p>
                    <p>Can you please provide us some details on your project so that we can analyse
                        it and give you quotation.</p>
                    <p>Thanks for your consideration !</p>
                    <p>Regards,
                        <br/>John</p>
                </div>
            </div>
        </div>

        <div id="headingCollapse2" class="card-header p-0">
            <a data-toggle="collapse" href="#collapse2" aria-expanded="false"
               aria-controls="collapse2" class="email-app-sender media border-0">

                <div class="media-left pr-1">
						<span class="avatar avatar-md">
							<img class="media-object rounded-circle"
                                 src="../../../app-assets/images/portrait/small/avatar-s-6.png"
                                 alt="Generic placeholder image">
						</span>
                </div>
                <div class="media-body w-100">
                    <h6 class="list-group-item-heading text-bold-700">Sarah Montery</h6>
                    <p class="list-group-item-text">To: me
                        <span>Today</span>
                        <span class="float-right">
								<i class="la la-reply mr-1"></i>
								<i class="la la la-mail-forward mr-1"></i>
								<i class="la la-ellipsis-v"></i>
							</span>
                    </p>
                </div>

            </a>
        </div>
        <div id="collapse2" role="tabpanel" aria-labelledby="headingCollapse2" class="card-collapse"
             aria-expanded="false">
            <div class="card-content">
                <div class="email-app-text card-body pt-0">
                    <div class="email-app-message">
                        <p>Hi John,</p>
                        <p>Thanks for your response ! My project requirement is as follows.</p>
                        <p>We need few dashboards with some inforation about company and we require
                            few pages for user interaction.</p>
                        <p>Hope this requirement is clear to you, or feel free to ask if you have
                            any queries !</p>
                        <p>Cheers~</p>
                    </div>
                    <hr>
                    <div class="email-attachment mr-1">
                        <div class="row">
                            <div class="col-8 text-left">
                                <p class="text-bold-700">Attachments
                                    <span class="text-muted text-bold-500 d-block d-lg-none d-xl-inline">
											(3 files, 42.5 MB)
										</span>
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ft-download font-medium-3"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-12 mb-1">
                                <img class="img-thumbnail img-fluid"
                                     src="../../../app-assets/images/gallery/16.jpg"
                                     alt="Image description">
                            </div>
                            <div class="col-xl-3  col-lg-12  mb-1">
                                <img class="img-thumbnail img-fluid"
                                     src="../../../app-assets/images/gallery/5.jpg"
                                     alt="Image description">
                            </div>
                            <div class="col-xl-3  col-lg-12  mb-1">
                                <img class="img-thumbnail img-fluid"
                                     src="../../../app-assets/images/gallery/4.jpg"
                                     alt="Image description">
                            </div>
                            <div class="col-xl-3  col-lg-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="email-app-text-action card-body">

        </div>
    </div>
@endsection