package resalSocial;

import java.util.HashMap;

import grapheX.Sommet;
import reseauSocial.core.MemberInterface;

public class Membre extends Sommet implements MemberInterface{
	
	HashMap<Membre, Integer> relations = new HashMap<Membre, Integer>();
	
	private String nom;
	private int age;
	private String descr;

	public Membre(String nom, int age, String descr){
		super(nom);
		this.nom = nom;
		this.age = age;
		this.descr = descr;
	}
	
	@Override
	public int getAge() {
		return age;
	}

	@Override
	public String getDescription() {
		return descr;
	}

	@Override
	public String ident() {
		return nom;
	}

	
}
