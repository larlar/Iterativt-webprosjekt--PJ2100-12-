<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<html>
	<body>
		<table>
			<tr>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>E-mail</th>
				<th>Role</th>
				<th>Country</th>
				<th>Team name</th>
			</tr>
			
			<c:forEach var="user" items = "${users}">
				<tr>
					<td><c:out value="${user.lastName}" /></td>
					<td><c:out value="${user.firstName}" /></td>
					<td><c:out value="${user.email}" /></td>
					<td><c:out value="${user.role}" /></td>
					<td><c:out value="${user.country}" /></td>
					<td><c:out value="${user.groupName}" /></td>
				</tr>
			</c:forEach>
		</table>
	</body>
</html>
