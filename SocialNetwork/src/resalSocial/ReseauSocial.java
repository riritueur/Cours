package resalSocial;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Observable;
import java.util.Set;

import facebookGhost.FacebookGhostNetwork;
import facebookGhost.User;
import grapheSimple.GrapheSimple;
import grapheSimple.ParcoursSimple;
import grapheX.Sommet;
import reseauSocial.core.MemberInterface;
import reseauSocial.core.SocialNetworkInterface;

public class ReseauSocial implements SocialNetworkInterface{
	String nom;
	GrapheSimple g = new GrapheSimple();
	
	public ReseauSocial(String nom){this.nom = nom;}

	@Override
	public void update(Observable arg0, Object arg1) {
	}

	@Override
	public MemberInterface getMember(String identifier) {
		return (MemberInterface) g.getSommet(identifier);
	}

	@Override
	public Collection<? extends MemberInterface> getMembers() {
		try{
			return (Collection<? extends MemberInterface>) g.sommets();
		}catch(Exception e){
			return null;
		}
	}

	@Override
	public MemberInterface addMember(String identifier, int age, String description) {
		Membre m = new Membre(identifier,age,description);
		g.ajouterSommet(m);
		return m;
	}

	@Override
	public MemberInterface addMember(String ident, boolean belongsToAnotherNetwork) {
		if(belongsToAnotherNetwork){
			FacebookGhostNetwork t = new FacebookGhostNetwork();
			User u = t.getUser(ident);
			ArrayList<User> friends = u.getFriends();
			ArrayList<User> family = u.getFamily();
			
			getMember(friends.get(0).getName());
			
			return addMember(u.getName(),u.getAgeRange().getAge(),u.myProfil());
		}
		return null;
	}

	@Override
	public void relate(int force, MemberInterface member, MemberInterface friend) {
		g.ajouterArc((Sommet) member, (Sommet) friend, force);
		g.ajouterArc((Sommet) friend, (Sommet) member, force);
	}

	@Override
	public Set<? extends MemberInterface> relateToRank(MemberInterface member, int rank) {
		ParcoursSimple parcours = new ParcoursSimple(g);
		Set<? extends MemberInterface> result;
		for(Sommet m : parcours.voisinsAuRang((Sommet) member, rank)){
			relate(1, member, (MemberInterface) m);
		}
		return (Set<? extends MemberInterface>) parcours.voisinsAuRang((Sommet) member, rank);
	}

	@Override
	public int distance(MemberInterface member1, MemberInterface member2) {
		return new ParcoursSimple(g).cheminLePlusCourt((Sommet) member1, (Sommet) member2).distance();
	}

	@Override
	public void setOtherNetwork(FacebookGhostNetwork f) {
		// TODO Auto-generated method stub
		
	}
	
}
