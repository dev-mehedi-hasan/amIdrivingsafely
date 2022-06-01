<!DOCTYPE html>
<html>
<head>
<style>
body{
  font-family:  Poppins;
}
table {
  border-collapse: collapse;
  width: 100%;
  border-radius: 5px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table th {
  font-family:  Sora;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #009ef7;
  color: white;
}
.badge{
    color: #fff;
    display: inline-block;
    padding-left: 8px;
    padding-right: 8px;
    text-align: center;
}
.badge.text-info{
    background-color: #009ef7;
}
.badge.text-success{
    background-color: #47BE7D;
}
</style>
<title></title>
</head>
<body>
    <h1>A new ticket has been raised by {{$details['created_by']}} <span class="badge @if($details['user_Type'] == 'Agent') text-info @else text-success @endif">{{$details['user_Type'] ?? 'Not Available'}}</span></h1>
    <p>The ticket is about {{ $details['incident_type'] ?? 'Not Available' }} and the vehicle type is {{$details['type_of_vehicle'] ?? 'Not Available'}}</p>

    <table>
        <tr>
            <th>Ticket ID</th>
            <th>Created by</th>
            <th>Created at</th>
            <th>Complainant name</th>
            <th>Complainant number</th>
            <th>Location of incident</th>
            <th>Vehicle number</th>
            <th>Incident type</th>
            <th>Comment/Recommendation</th>
            <th>Sticker</th>
            <th>Type of vehicle</th>
            <th>Attachment</th>
        </tr>
        <tr>
            <td>{{$details['ticket_id'] ?? 'Not Available'}}</td>
            <td>{{$details['created_by'] ?? 'Not Available' }}<span class="badge @if($details['user_Type'] == 'Agent') text-info @else text-success @endif">{{$details['user_Type'] ?? 'Not Available'}}</span></td>
            <td>{{$details['created_at'] ?? 'Not Available'}}</td>
            <td>{{$details['complainant_name'] ?? 'Not Available'}}</td>
            <td>{{$details['complainant_number'] ?? 'Not Available' }}</td>
            <td>{{$details['location_of_incident'] ?? 'Not Available'}}</td>
            <td>{{$details['vehicle_number'] ?? 'Not Available'}}</td>
            <td>{{$details['incident_type'] ?? 'Not Available'}}</td>
            <td>{{$details['comment_recommendation'] ?? 'Not Available'}}</td>
            <td>{{$details['sticker'] ?? 'Not Available'}}</td>
            <td>{{$details['type_of_vehicle'] ?? 'Not Available'}}</td>
            <td>{{$details['attachment_size'] ?? 'Not Available'}}</td>
        </tr>
    </table>
   
</body>
</html>