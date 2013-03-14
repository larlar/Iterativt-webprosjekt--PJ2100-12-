package no.nith;

import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.sql.Connection;


public class DBDAO {

	public List<Users> getUsers() {
		List<Users> users = new ArrayList<Users>();
		
				
				//SQLDetails refererer til en klasse som inneholder url, brukernavn og passord for MySQL tilkoblingen
				try {
					Connection connection = DriverManager.getConnection(SQLDetails.url, SQLDetails.user, SQLDetails.password);
					
					String sql = "select LastName, FirstName, Email, r.Role, c.Country as Country, t.team_name as Team " +
							"from members as m " +
							"join roles as r on r.role_ID = m.role_ID " +
							"join countries c on c.country_ID = m.country_ID " +
							"left join teams t on t.Team_ID = m.team_ID;";
											
					PreparedStatement stmt = connection.prepareStatement(sql);
					
					ResultSet rs = stmt.executeQuery();
					
					// Loopen skal legge verdier fra søket inn i arraylisten
					
					while(rs.next()) {
						users.add(new Users(
								rs.getString("FirstName"), 
								rs.getString("LastName"), 
								rs.getString("Email"), 
								rs.getString("Country"),
								rs.getString("Team"),
								rs.getString("Role")
							));
					}
					
				} catch (SQLException e) {
					e.printStackTrace();
					System.out.println("Fail");
					}
				return users;
				}
			
	
//	public List<UsersDB> getUsers(String query) {
//		List<UsersDB> users = new ArrayList<UsersDB>();
//		String url = "jdbc:mysql://localhost/daredigital";
//		String user = "daredig";
//		String password = "D4repass";
//		
//		try {
//			java.sql.Connection connection = DriverManager.getConnection(url, user, password);
//			
//			
//			String sql = "SELECT FROM teams WHERE teamName LIKE ? ORDER BY teamID";
//			PreparedStatement statement = connection.prepareStatement(sql);
//			
//			statement.setString(1, query);
//			
//			ResultSet resultater = statement.executeQuery();
//			
//			while(resultater.next()) {
//				String teamName = resultater.getString("teamName");
//				
//				users.add(new UsersDB(teamName, teamName, teamName));
//			}
//		} catch (SQLException e) {
//			e.printStackTrace();
//		}
//		return users;
//	}
	
//public void insertBook(String firstName) {
//		
//		// Databasetilkobling
//		String url = "jdbc:mysql://localhost/daredigital";
//		String username = "daredig";
//		String password = "D4repass"; 
//		
//		// Kobler til db
//		try {
//			java.sql.Connection connection =
//					DriverManager.getConnection(url, username, password);
//			
//			String sql = "INSERT INTO members (firstName) VALUES (?);";
//			PreparedStatement statement = connection.prepareStatement(sql);
//			
//			statement.setString(1, firstName);
//			
//			statement.executeUpdate();
//			
//		} catch (SQLException e) {
//			e.printStackTrace();
//		}
//	}
}

