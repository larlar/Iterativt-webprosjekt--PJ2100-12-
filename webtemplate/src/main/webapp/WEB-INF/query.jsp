<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <title>Resultater</title>
	<link rel="stylesheet" href="css/main.css" />
</head>
<body>

<!--
<form class="form-search">
	<input type="text" name="search" class="input-medium search-query" value="<c:out value="${param.search}" />">
	<button type="Search" class="btn">Search</button>
	</form>
-->

	
	<table class="table">
		<thead>
			<tr>
				<th>Fornavn</th>
				<th>Etternavn</th>

			</tr>
		</thead>
	
		<c:forEach var="users" items="${users}" >
			<tr>
				<td><c:out value="${users.firstName}" /></td>
				<td><c:out value="${users.lastName}" /></td>
			</tr>
		</c:forEach>
		</table>
		


</body>
</html>