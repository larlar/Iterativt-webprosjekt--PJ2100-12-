package no.nith;

/*
 * setmetoder for å bruke det i DBDAO
 */

public class UsersDB {
	private String forNavn;
	private String etterNavn;
	private String teamName;
	
	public UsersDB() {
		
	}
	
	public UsersDB(String forNavn, String etterNavn, String teamName) {
		this.setforNavn(forNavn);
		this.setetterNavn(etterNavn);
		this.setteamName(teamName);
	}
	
	public void setforNavn(String forNavn) {
		this.forNavn = forNavn;
	}
	
	public void setetterNavn(String etterNavn) {
		this.etterNavn = etterNavn;
	}
	
	public void setteamName(String teamName) {
		this.teamName = teamName;
	}
	public String getforNavn(String forNavn) {
		return forNavn;
	}
	
	public String getetterNavn(String etterNavn) {
		return etterNavn;
	}

	public String getteamName(String teamName) {
		return teamName;
	}
}
