package no.nith;

import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.mysql.jdbc.Connection;


public class DBDAO {

	public List<UsersDB> getUsers() {
		List<UsersDB> users = new ArrayList<UsersDB>();
		
		String url = "jdbc:mysql://localhost/daredigital";
		
		// Bruker og passord til databasen, må endres på stedene det settes opp, eller scriptes til å settes på db-server
		
		String user = "daredig";
		String password = "D4repass"; {
		
			
				try {
					java.sql.Connection connection = DriverManager.getConnection(url, user, password);
					
					String sql = "Select * FROM members";
					PreparedStatement stmt = connection.prepareStatement(sql);
					
					ResultSet rs = stmt.executeQuery();
					
					// Loopen skal legge verdier fra søket inn i arraylisten
					
					while(rs.next()) {
						users.add(new UsersDB(rs.getString("firstName"), rs.getString("lastName"), sql));
					}
					
				} catch (SQLException e) {
					e.printStackTrace();
					System.out.println("Fail");
					}
				return users;
				}
			}
	
	public List<UsersDB> getUsers(String query) {
		List<UsersDB> users = new ArrayList<UsersDB>();
		String url = "jdbc:mysql://localhost/daredigital";
		String user = "daredig";
		String password = "D4repass";
		
		try {
			java.sql.Connection connection = DriverManager.getConnection(url, user, password);
			
			
			String sql = "SELECT FROM teams WHERE teamName LIKE ? ORDER BY teamID";
			PreparedStatement statement = connection.prepareStatement(sql);
			
			statement.setString(1, query);
			
			ResultSet resultater = statement.executeQuery();
			
			while(resultater.next()) {
				String teamName = resultater.getString("teamName");
				
				users.add(new UsersDB(teamName, teamName, teamName));
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return users;
	}
	
public void insertBook(String firstName) {
		
		// Databasetilkobling
		String url = "jdbc:mysql://localhost/daredigital";
		String username = "daredig";
		String password = "D4repass"; 
		
		// Kobler til db
		try {
			java.sql.Connection connection =
					DriverManager.getConnection(url, username, password);
			
			String sql = "INSERT INTO members (firstName) VALUES (?);";
			PreparedStatement statement = connection.prepareStatement(sql);
			
			statement.setString(1, firstName);
			
			statement.executeUpdate();
			
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}

