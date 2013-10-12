School Me
========================================================================


Rest Resources
------------------------------------------------------------------------

All REST resources support GET,POST,PUT and DELETE methods. To retrieve 
a resource by id do: 

    METHOD /api/api/resource_name_here/id/{the resource id}

For example to retrieve a county with id of 1:

    GET /api/api/county/id/1

All REST objects also support collections by querying with the following
convention.

    GET /api/api/resource_name_here/

To create or update resources use POST to create and PUT to update. Use
JSON to create the form data. For example, to create a County:

    POST /api/api/county/
    { 
        "name" : "Test Name"
    }



###County

County has the following fields: 
<table>
    <thead>
        <tr>
            <th>Field</th>
            <th>Description</th>
        </tr>               
    </thead>
    <tbody>
        <tr>
            <td>name</td>
            <td>The name of the County</td>
        </tr>           
    </tbody>
</table>


###District

District has the following fields: 
<table>
    <thead>
        <tr>
            <th>Field</th>
            <th>Description</th>
        </tr>               
    </thead>
    <tbody>
        <tr>
            <td>name</td>
            <td>The name of the District</td>
        </tr>           
        <tr>
            <td>county_id</td>
            <td>The id of the County this District belongs to</td>
        </tr>           
    </tbody>
</table>
