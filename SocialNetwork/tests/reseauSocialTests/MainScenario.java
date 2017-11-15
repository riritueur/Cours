package reseauSocialTests;

import static org.junit.Assert.*;
import facebookGhost.FacebookGhostNetwork;

import java.util.Collection;
import java.util.Set;

import org.junit.Before;
import org.junit.Test;


// This class corresponds to my implementation.
// You must substitute your own class.
import reseauSocial.core.SocialNetworkInterface;

import reseauSocial.core.MemberInterface;
import reseauSocial.core.SocialNetworkInterface;




public class MainScenario {

    //Reference to modify
    SocialNetworkInterface iutRS;

    @Before
    public void setUp() throws Exception {
        iutRS = new SocialNetWorkImpl("IUT");

    }
    @Test
    public void testInit() {
        assertTrue(iutRS != null);
    }

    /*
        Serie of simple tests
     */
    private MemberInterface buildGeek(String name, int age, String description) {
        iutRS.addMember(name, age, description);
        return iutRS.getMember(name);
    }

    @Test
    public void testAddAndGetMemberSimple() {
        MemberInterface m_geek01 = buildGeek("geek01", 18, "S1T, le plus beau");
        assertEquals("geek01", m_geek01.ident());
        assertEquals(18, m_geek01.getAge());
        assertEquals("S1T, le plus beau", m_geek01.getDescription());
    }
    @Test
    public void testAddAndGetTwoMembers() {
        MemberInterface m_geek01 = buildGeek("geek01", 18, "S1T, le plus beau");
        MemberInterface m_geek02 = buildGeek("ivana",Integer.MIN_VALUE, "Princesse Geek");
        assertEquals("geek01", m_geek01.ident());
        assertEquals("ivana", m_geek02.ident());
    }

    @Test
    public void testGetMembers() {
        iutRS.addMember("geek01", 18, "S1T, le plus beau");
        iutRS.addMember("ivana",Integer.MIN_VALUE, "Princesse Geek");
        Collection<? extends MemberInterface> membres = iutRS.getMembers();
        assertEquals("taille du reseau est bien de 2 membres", 2,membres.size());
    }


    //------------ Construction des relations ------- //

    private void buildAsterixNetwork() {
        MemberInterface asterix = iutRS.addMember("Asterix",0,"Asterix, le plus intelligent");
        MemberInterface falbala = iutRS.addMember("Falbala",0,"falbala, la plus jolie");
        MemberInterface obelix = iutRS.addMember("Obelix",0,"Obelix, le plus intelligent");
        MemberInterface panoramix =iutRS.addMember("Panoramix",0,"Panoramix, le plus magique");
        MemberInterface abraracourcix = iutRS.addMember("Abraracourcix",0,"Abraracourcix, chef du village");

        iutRS.relate(1, asterix, obelix);
        iutRS.relate(1, asterix, panoramix);
        iutRS.relate(1, obelix, asterix);
        iutRS.relate(2, obelix, falbala);
        iutRS.relate(3, obelix, panoramix);
        iutRS.relate(4, falbala, obelix);
        iutRS.relate(4, falbala, asterix);
        iutRS.relate(4, panoramix,abraracourcix);
    }

    @Test
    public void testRelationsAtRankOne() {

        buildAsterixNetwork();
        MemberInterface asterix = iutRS.getMember("Asterix");
        MemberInterface obelix = iutRS.getMember("Obelix");
        MemberInterface panoramix = iutRS.getMember("Panoramix");


        //tests au rang 1
        Set<? extends MemberInterface> membresAmis = iutRS.relateToRank(asterix, 1);
        //System.out.println("Amis de Asterix" + membresAmis);
        assertEquals("taille des amis d'Asterix au rang 1 : 2 membres", 2, membresAmis.size());
        assertTrue("Asterix est bien ami d'Obelix", membresAmis.contains(obelix));
        assertTrue("Asterix est bien ami de Panoramix", membresAmis.contains(panoramix));
        membresAmis = iutRS.relateToRank(panoramix, 1);
        //System.out.println("Amis de Panoramix" + membresAmis);
        assertEquals("taille des amis de Panoramix au rang 1 : 1 membres", 1, membresAmis.size());
    }

    @Test
    public void testRelationsAtRankTwo() {

        buildAsterixNetwork();
        MemberInterface asterix = iutRS.getMember("Asterix");
        MemberInterface obelix = iutRS.getMember("Obelix");
        MemberInterface panoramix = iutRS.getMember("Panoramix");
        MemberInterface falbala = iutRS.getMember("Falbala");
        MemberInterface abraracourcix = iutRS.getMember("Abraracourcix");

        //tests au rang 2
        Set<? extends MemberInterface> membresAmis = iutRS.relateToRank(asterix, 2);
        //System.out.println("Amis de Asterix au rang 2" + membresAmis);
        assertEquals("taille des amis d'Asterix au rang 2 : 2 membre Falbala et Abraracourcix, les autres le sont deja au rang 1", 2, membresAmis.size());
        assertTrue("Asterix est bien ami de falbala au rang 2", membresAmis.contains(falbala));
        membresAmis = iutRS.relateToRank(panoramix, 2);
        assertEquals("taille des amis de Panoramix au rang 2 : 0 membres", 0, membresAmis.size());
        membresAmis = iutRS.relateToRank(obelix, 2);
        //System.out.println("Amis de Obelix au rang 2" + membresAmis);
        assertEquals("taille des amis Obelix au rang 2 : 1 membre", 1, membresAmis.size());
        membresAmis = iutRS.relateToRank(falbala, 3);
        assertEquals("taille des amis Falbala au rang 3 : 1 membre", 1, membresAmis.size());
        assertTrue("Abraracourcix est bien ami de falbala au rang 3", membresAmis.contains(abraracourcix));

    }

    @Test
    public void testDistances() {
        buildAsterixNetwork();
        MemberInterface asterix = iutRS.getMember("Asterix");
        MemberInterface obelix = iutRS.getMember("Obelix");
        MemberInterface falbala = iutRS.getMember("Falbala");
        MemberInterface abraracourcix = iutRS.getMember("Abraracourcix");

        //Calcul des distances
        int distance = iutRS.distance(asterix, obelix);
        assertEquals("distance entre asterix et obelix", 1, distance);
        distance = iutRS.distance(asterix, falbala);
        assertEquals("distance entre asterix et falbala", 3, distance);
        distance = iutRS.distance(falbala, asterix);
        assertEquals("distance entre falbala et asterix", 4, distance);
        distance = iutRS.distance(falbala, abraracourcix);
        assertEquals("distance entre falbala et Abraracourcix", 9, distance);
    }


    //------------ Connexions e FG ------- //
    private FacebookGhostNetwork getFacebookGhostNetwork() {
        FacebookGhostNetwork fg = new FacebookGhostNetwork();
        //System.out.println(fg);
        iutRS.setOtherNetwork(fg);
        return fg;
    }

    private MemberInterface buildGreekmythologieNetwork(FacebookGhostNetwork fg) {
        MemberInterface admete = iutRS.addMember("Admete", true);
        assertEquals("description de Ademete",
                admete.getDescription(),
                fg.getUser("Admete").myProfil());
        return admete;
    }


    @Test
    public void testConnexionToFGInitialisation() {
        FacebookGhostNetwork fg = getFacebookGhostNetwork();
        MemberInterface admete = buildGreekmythologieNetwork(fg);
        Set<? extends MemberInterface> membresAmis = iutRS.relateToRank(admete, 1);
        assertEquals("taille des amis d'ADMETE au rang 1 : 0 membres", 0, membresAmis.size());
    }



    @Test
    public void testConnexionToFGWithlinks() {
        FacebookGhostNetwork fg = getFacebookGhostNetwork();
        //In this network zeus, Alcmene Hercule mother, Hercule son of Zeus, Admete his friends, Hera (not known as Zeus wife)

        MemberInterface admete = buildGreekmythologieNetwork(fg);
        MemberInterface zeus = iutRS.addMember("Zeus", true);
        MemberInterface hera = iutRS.addMember("Hera", true);
        MemberInterface hercule = iutRS.addMember("Hercule", true);


        //Test relations
        Set<? extends MemberInterface> membresAmis = iutRS.relateToRank(admete, 1);
        assertEquals("taille des amis de Admete au rang 1 : 1 membre Hercule", 1, membresAmis.size());

        membresAmis = iutRS.relateToRank(hera, 1);
        //System.out.println("amis Hera au rang 1" + membresAmis);
        assertEquals("taille des amis Hera au rang 1 : 1 membres", 0, membresAmis.size());

        membresAmis = iutRS.relateToRank(hercule, 1);
        //System.out.println("relations de hercule" + membresAmis);
        assertEquals("taille des amis d'Hercule au rang 1 : 2 membres Admete et Zeus: ", 2, membresAmis.size());
        assertTrue("Zeus est bien ami de Hercule au rang 1", membresAmis.contains(zeus));
        assertTrue("Admete est bien ami de Hercule au rang 1", membresAmis.contains(admete));

        int distance = iutRS.distance(hercule, zeus);
        assertEquals("distance entre hercule et zeus", 2, distance);
        distance = iutRS.distance(hercule, admete);
        assertEquals("distance entre hercule et admete", 3, distance);

        membresAmis = iutRS.relateToRank(hercule, 2);
        //System.out.println("amis d'Hercule au rang 2" + membresAmis);
        assertEquals("taille des amis d'Hercule au rang 2 : 0 membre", 0, membresAmis.size());


        membresAmis = iutRS.relateToRank(admete, 1);
        //System.out.println("amis d'ADMETE au rang 1" + membresAmis);
        assertEquals("taille des amis d'ADMETE au rang 1 : 1 membres", 1, membresAmis.size());
        distance = iutRS.distance(admete, hercule);
        assertEquals("distance entre hercule et admete", 3, distance);
    }


    //------------ Observations  : Connexions e FG ------- //
    @Test
    public void testConnexionToFGAndObserver() {
        FacebookGhostNetwork fg = getFacebookGhostNetwork();
        buildGreekmythologieNetwork(fg);
        MemberInterface zeus = iutRS.addMember("Zeus", true);
        MemberInterface hera = iutRS.addMember("Hera", true);
        MemberInterface hercule = iutRS.addMember("Hercule", true);
        fg.addObserver(iutRS);
        fg.addFamilyRelation("Zeus", "Hera");

        Set<? extends MemberInterface> membresAmis = iutRS.relateToRank(hera, 1);
        assertEquals("taille des amis Hera au rang 1 : 1 membres", 1, membresAmis.size());
        membresAmis = iutRS.relateToRank(hercule, 1);
        assertEquals("taille des amis d'Hercule au rang 1 : 2 membre", 2, membresAmis.size());
        membresAmis = iutRS.relateToRank(hercule, 2);
        assertEquals("taille des amis d'Hercule au rang 2 : 1membre", 1, membresAmis.size());

        //Non demande
     /*   MemberInterface asterix = iutRS.addMember("Asterix",0,"Asterix, le plus intelligent");
        fg.addUser("Asterix", "Albert Uderzo, Asterix est le seul anti-heros qui ait jamais autant collectionne les succes et les exploits.");
        assertEquals("description de Asterix", asterix.getDescription(), fg.getUser("Asterix").myProfil());
     */

    }
}
