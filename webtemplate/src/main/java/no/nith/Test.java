package no.nith;

import java.io.IOException;
import java.util.List;
import java.io.PrintWriter;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import com.mysql.jdbc.Connection;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Test extends HttpServlet {
	public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		String query = request.getParameter("q");
		List<UsersDB> users;
		
		if(query != null && query.length() > 0) {
			users = new UsersDB().getUsers(query);
		} else {
			users = new UsersDB().getUsers();
		}
		
		RequestDispatcher view = request.getRequestDispatcher("/WEB-INF/test.jsp");
		view.forward(request, response);
	}
}