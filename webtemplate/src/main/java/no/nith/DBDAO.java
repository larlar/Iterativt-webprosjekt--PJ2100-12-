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
					Class.forName("com.mysql.jdbc.Driver");
					Connection connection = DriverManager.getConnection(SQLDetails.url, SQLDetails.user, SQLDetails.password);
					
					//MySQL spørring som henter ut informasjon fra 4 tabeller. Slår opp country_ID i country tabellen
					//role_ID i roles tabellen og team_ID i teams tabellen
					String sql = "select LastName, FirstName, Email, r.Role, c.Country as Country, t.team_name as Team " +
							"from members as m " +
							"join roles as r on r.role_ID = m.role_ID " +
							"join countries c on c.country_ID = m.country_ID " +
							"left join teams t on t.Team_ID = m.team_ID;";
											
					PreparedStatement stmt = connection.prepareStatement(sql);
					
					ResultSet rs = stmt.executeQuery();
					
					// Loopen skal legge verdier fra sÃ¸ket inn i arraylisten
					
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
			
	
	public List<Users> getUsers(String query) {
		List<Users> users = new ArrayList<Users>();
		String url = "jdbc:mysql://mysql.nith.no/larlar12";
		String user = "larlar12";
		String password = "larlar12";
		
		try {
			java.sql.Connection connection = DriverManager.getConnection(url, user, password);
			
			
			String sql = "SELECT FROM teams WHERE teamName LIKE ? ORDER BY teamID";
			PreparedStatement statement = connection.prepareStatement(sql);
			
			statement.setString(1, query);
			
			ResultSet resultater = statement.executeQuery();
			
			while(resultater.next()) {
				String teamName = resultater.getString("teamName");
				
				users.add(new Users(teamName, teamName, teamName, teamName, teamName, teamName));
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return users;
	}
	public void insertBook(String firstName) {
	
		// Kobler til db
		try {
			java.sql.Connection connection =
					DriverManager.getConnection(SQLDetails.url, SQLDetails.user, SQLDetails.password);
			
			String sql = "INSERT INTO members (firstName) VALUES (?);";
			PreparedStatement statement = connection.prepareStatement(sql);
			
			statement.setString(1, firstName);
			
			statement.executeUpdate();
			
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}

