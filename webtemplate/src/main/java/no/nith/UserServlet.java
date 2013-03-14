package no.nith;

import java.io.IOException;
import java.util.List;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class UserServlet extends HttpServlet {

	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException	{
		
		//1. Henter brukerne
		DBDAO dbDAO = new DBDAO();
		List<Users> users = dbDAO.getUsers();
		
		
		//2. Tilgjengeligjør users for JSP-siden i form av en attributt
		//ved navn "users". Kan hente denne i JSP-siden med ${users}
		req.setAttribute("users", users);
		
		//3. Sier fra om at JSP skal ta over ved å spesifisere fil
		RequestDispatcher view = req.getRequestDispatcher("WEB-INF/results.jsp");
		
		//... og leverer responsen basert på dataen vi har klargjort (users)
		view.forward(req, resp);
		
		
	}
	
}
