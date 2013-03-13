package no.nith;

public class Users {
	
	
	//the attributes a user has. Country and groupName is INT because they are stored in the DB as INT.
	private String firstName;
	private String lastName;
	private String email;
	private int country;
	private int groupName;
	
	//Constructor to set default values
	public Users() {
		firstName = "";
		lastName = "";
		email = "";
		country = 0;
		groupName = 0;
	}
	
	//Constructor to set values to the private variables
	public Users(String firstName, String lastName, String eMail, int country, int groupName) {
		setFirstName(firstName);
		setLastName(lastName);
		setEmail(eMail);
		setCountry(country);
		setGroupName(groupName);
	}
	//Set methods for firstName
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}
	//Set methods for lastName
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}
	
	//set method for eMail
	public void setEmail(String eMail) {
		this.email = eMail;
	}
	
	//set method for country
	public void setCountry(int country) {
		this.country = country;
	}
	
	//set method for groupName
	public void setGroupName (int groupName) {
		this.groupName = groupName;
	}
	
	//get method for FirstName | in html JSP this has the variable name: firstName
	public String getFirstName() {
		return this.firstName;
	}
	
	//get Method for lastName | in html JSP this has the variable name: lastName
	public String getLastName() {
		return this.lastName;
	}
	
	//get method for eMail | in html JSP this has the variable name: email
	public String getEmail() {
		return this.email;
	}
	
	//get method for Country | in html JSP this has the variable name: country
	public int getCountry() {
		return this.country;
	}
	//get method for groupname | in html JSP this has the variable name: groupName
	public int getGroupName () {
		return this.groupName;
	}
	
	
	
	
}
