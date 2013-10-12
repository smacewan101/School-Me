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

###Institute

Institute has the following fields:
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
            <td>school_id</td>
            <td>The id of the school</td>
        </tr>           
        <tr>
            <td>district_id</td>
            <td>The id of the district this school belongs to</td>
        </tr>           
    </tbody>
</table>


###Dropout

Dropout has the following fields:
<table>
    <thead>
        <tr>
            <th>Field</th>
            <th>Description</th>
        </tr>               
    </thead>
    <tbody>
        <tr>
            <td>year</td>
            <td>The year for this dropout statistics information</td>
        </tr>           
        <tr>
            <td>nine2twelve</td>
            <td>Percentage of drop outs that occured between 9-12th grade</td>
        </tr>           
        <tr>
            <td>seven2twelve</td>
            <td>Percentage of drop outs that occured between 7-12 grade</td>
        </tr>           
        <tr>
            <td>school_id</td>
            <td>The id of the school whose drop out rates this record belongs to</td>
        </tr>           
    </tbody>
</table>


###Completion

Completion has the following fields:
<table>
    <thead>
        <tr>
            <th>Field</th>
            <th>Description</th>
        </tr>               
    </thead>
    <tbody>
        <tr>
            <td>year</td>
            <td>The year for this dropout statistics information</td>
        </tr>           
        <tr>
            <td>enrollment</td>
            <td>New enrollment for this year</td>
        </tr>           
        <tr>
            <td>eventcomplete</td>
            <td>Percentage completing their 4 years this year</td>
        </tr>           
        <tr>
            <td>longitcomplete</td>
            <td>Some type of interesting data point that we don't know about.</td>
        </tr>           
        <tr>
            <td>school_id</td>
            <td>The id of the school whose drop out rates this record belongs to</td>
        </tr>           
    </tbody>
</table>