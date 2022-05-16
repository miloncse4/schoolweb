<!DOCTYPE html>
<html>
    <head>
        <title>Employee details info</title>
        <link href="{{asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
        table{
            border-collapse: collapse;
        }
        h2 h3{
            margin: 0;
            padding: 0;
        }
        .table{
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        .table th,
        .table td{
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th{
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody{
            border-top: 2px solid #dee2e6;
        }
        .table .table{
            background-color: #fff;
        }
        .table-bordered{
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td{
            border: 1px solid #dee2e6;
        }
        .table-bordered thead th,
        .table-bordered thead td{
           border-bottom-width: 2px;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        table tr td{
            padding: 5px;
        }
        .table-bordered thead th, .table-bordered td, .table-bordered th{
            border: 1px solid black !important;
        }
        .table-bordered thead th{
            background-color: #cacaca;
        }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <table width="80%">
                        <tr>
                            <td width="33%" class="text-center">
                                <img src="{{ URL('/uploads/Logo/logo.jpg') }}" style="width:150px; height:100px;"/>
                            </td>
                            <td class="text-center" width="63%">
                                <h4><strong><i>Dhubni Kanchi Bari High School</i></strong></h4>
                                <h5><strong><i>Dhubni Bazer, Sundarganj, Gaibandha</i></strong></h5>
                                <h6><strong><i>www.dhubnikanchibarihighschool.edu.com.bd</i></strong></h6>
                            </td>
                            <td width="33%" class="text-center">
                                <img src="{{ (!empty($pay->img))?asset('uploads/employee_images/'.$pay->img)
                                :asset('uploads/user.png') }}" style="width:100px; height:100px;"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12 text-center">
                    <h5 style="font-weight: bold; color:red; padding-top:-25px; margin-right:70px;"><i>Employee Pay-slip</i></h5>
                </div>
                <div class="col-md-12">
                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <td style="width: 50%" >Employee name</td>
                                <td>{{ $pay->name }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" >Designation</td>
                                <td>{{ $pay['designation']['name'] }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" >Mobile</td>
                                <td>{{ $pay->mobile }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" >ID NO</td>
                                <td>{{ $pay->id_no }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" >Gender</td>
                                <td>{{ $pay->gander }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" >Month</td>
                                <td>{{ date("M") }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" >Salary</td>
                                <td>{{ $pay->salary }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <i style="font-size:10px; color:red;">Print Data: {{ date("d M Y") }}</i>
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <table border="0" width="100%">
                        <tbody>
                            <tr>
                                <td style="width:30%"></td>
                                <td style="width:30%"></td>
                                <td style="width:40%; text-align:center;">
                                    <hr style="border:solid 1px; color:black; width:60%;margin-bottom:0px;">
                                    <p style="text-align:center;">Principal/Headmaster</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>