package no.nith;

import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import com.mysql.jdbc.Connection;


/* Fordi jeg hadde en ordentlig brainfart
 * med å få mysql.jar til å virke med
 * eclipse. så har dette tatt lenger tid enn jeg trodde
 * skal sette opp flere spørringer mot databasen i morgen,
 * og sette opp en webside med skikkelig interface
 * heldigvis er jeg egentlig greit på vei i forhold til tidsskjemaet mitt
 * 
 */

public class SQLconnect {
	public static void Main(String[] args) {
	String url = "jdbc:mysql://localhost/daredigital";
	
	// Bruker og passord til databasen, må endres på stedene det settes opp, eller scriptes til å settes på db-server
	
	String user = "daredig";
	String password = "D4repass"; {
	
		
			try {
				java.sql.Connection connection = DriverManager.getConnection(url, user, password);
				
				String sql = "Select * FROM members";
				PreparedStatement stmt = connection.prepareStatement(sql);
				
				ResultSet rs = stmt.executeQuery();
				
				// Denne må kjøres før vi kan hente ut dataene
				
				rs.next();
				
				// Denne skriver ut resultatet av select statement
				
				String statementResult = rs.getString("firstName");
					System.out.println(statementResult);
				
				
			} catch (SQLException e) {
				e.printStackTrace();
				System.out.println("Fail");
				}
			}
		}
	}
