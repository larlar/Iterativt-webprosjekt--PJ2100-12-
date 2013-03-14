<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <title>Resultater</title>
	
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
	
		
		
		<!-- Søkeskjema prototype -->
		<form class="form search">
			<input type="text" name="q" class="input-medium search-query" value="<c:out value="${param.q}" />">
			<button type="submit" class="btn">Search</button>
		</form>
		
		<!-- Database insert -->
		<form class="form">
			<input type="text" name="firstName" class="input-medium" value="<c:out value="${param.firstName}" />">
			<button type="submit" class="btn">Insert name</button>
		</form>
		
		<!-- var må være samme som servlet, det tok det meg litt tid å huske -->
		<!-- Men virker fremdeles ikke, klager over feil type variabel
		<c:forEach var="Test" items="${users}" >
			<tr>
				<td><c:out value="${users.firstName}" /></td>
				<td><c:out value="${users.lastName}" /></td>
			</tr>
		</c:forEach> -->
		</table>
		


</body>
</html>