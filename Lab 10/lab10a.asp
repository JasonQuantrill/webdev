<%

' Get the background color from the query string
Dim bgColor
bgColor = Request.QueryString("color")


Response.Write("<html><head><style>body { font-family: Arial, Helvetica, sans-serif; background-color: " & bgColor & "; }</style></head><body>")

Dim lastVisit
lastVisit = Request.Cookies("LastVisit")

If lastVisit = "" Then
    Response.Write("<p>This is your first visit to this sit.</p>")
Else
    Response.Write("<p>Your previous visit was on: " & lastVisit & "</p>")
End If


Response.Cookies("LastVisit") = Now()
Response.Cookies("LastVisit").Expires = Date + 1 

Response.Write("</body></html>")
%>